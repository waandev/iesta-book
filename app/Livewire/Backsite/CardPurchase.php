<?php

namespace App\Livewire\Backsite;

use App\Models\Address;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\City;
use App\Models\Courier;
use App\Models\Province;
use Auth;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use Livewire\Component;

class CardPurchase extends Component
{
    public $method = null;
    public $hasAddress = false;
    public $addressInput;
    public $showModal = false;

    public $provinces = [];
    public $cities = [];
    public $couriers = [];

    public $selectedProvince = null;
    public $selectedCity = null;
    public $selectedCourier = '';
    public $weight = ''; // Berat dalam gram
    public $shippingCost = null;

    public $recipientName;
    public $phoneNumber;
    public $label;
    public $fullAddress;
    public $setAsPrimary = false;

    public $provinceName = null;
    public $cityName = null;

    public $selectedShippingOption = '';

    protected $listeners = ['purchaseMethodUpdated', 'addressUpdated'];

    public function purchaseMethodUpdated($value)
    {
        $this->method = $value;
        $this->hasAddress = $this->checkIfAddressExists();
    }

    public function mount()
    {
        $this->provinces = $this->getProvinces();
        $primaryAddress = $this->getPrimaryAddress();

        if ($primaryAddress) {
            $this->recipientName = $primaryAddress->recipient_name;
            $this->phoneNumber = $primaryAddress->phone_number;
            $this->label = $primaryAddress->label;
            $this->fullAddress = $primaryAddress->full_address;
            $this->selectedProvince = $primaryAddress->province_id;
            $this->selectedCity = $primaryAddress->city_id;
            $this->hasAddress = true;

            $province = Province::where('province_id', $primaryAddress->province_id)->first();
            $city = City::where('city_id', $primaryAddress->city_id)->first();

            $this->provinceName = $province ? $province->title : null;
            $this->cityName = $city ? $city->title : null;

            $this->couriers = $this->getCouriers();
        }
    }

    public function getPrimaryAddress()
    {
        return Address::where('user_id', Auth::id())
            ->where('is_primary', true)
            ->first();
    }

    public function updatedSelectedProvince($provinceId)
    {
        $this->cities = $this->getCities($provinceId);
        $this->selectedCity = null;
    }

    public function getProvinces()
    {
        $provinces = Province::pluck('title', 'province_id');
        return collect($provinces);
    }

    public function getCities($provinceId)
    {
        $cities = City::where('province_id', $provinceId)->pluck('title', 'city_id');
        return collect($cities);
    }

    public function getCouriers()
    {
        $couriers  = Courier::pluck('title', 'code');
        return collect($couriers);
    }

    public function calculateShippingCost()
    {
        if ($this->selectedCity && $this->selectedCourier) {

            $cart = Cart::where('user_id', Auth::id())->first();

            if ($cart) {

                $cartItems = CartItem::where('cart_id', $cart->id)
                    ->where('is_selected', 1)
                    ->get();

                $totalWeight = 0;
                foreach ($cartItems as $cartItem) {

                    $totalWeight += $cartItem->quantity * $cartItem->publication->weight;
                }

                $this->weight = $totalWeight * 1000;

                // dd($this->weight);

                $costs = RajaOngkir::ongkosKirim([
                    'origin' => 132, // ID kota asal Gowa
                    'destination' => $this->selectedCity,
                    'weight' => $this->weight,
                    'courier' => $this->selectedCourier,
                ])->get();

                $this->shippingCost = [];
                foreach ($costs[0]['costs'] as $costOption) {
                    $service = strtolower($costOption['service']);
                    if (str_contains($service, 'reg')) {
                        $this->shippingCost[] = [
                            'service' => $costOption['service'],
                            'description' => $costOption['description'],
                            'cost' => $costOption['cost'][0]['value'],
                            'estimated_time' => $costOption['cost'][0]['etd'],
                        ];
                    }
                }
            }
        }
    }


    public function updatedSelectedCity()
    {
        $this->calculateShippingCost();
    }

    public function updatedSelectedCourier()
    {
        $this->calculateShippingCost();
    }

    public function updatedSelectedShippingOption($selectedOption)
    {
        $selectedCost = collect($this->shippingCost)->firstWhere('service', $selectedOption);
        $this->dispatch('shippingOptionUpdated', $selectedCost);
    }

    public function addAddress()
    {
        $this->validate([
            'recipientName' => 'required|string|max:255',
            'phoneNumber' => 'required|numeric',
            'label' => 'required|string|max:255',
            'selectedProvince' => 'required|exists:provinces,province_id',
            'selectedCity' => 'required|exists:cities,city_id',
            'fullAddress' => 'required|string|max:255',
        ]);

        Address::create([
            'user_id' => Auth::user()->id,
            'recipient_name' => $this->recipientName,
            'phone_number' => $this->phoneNumber,
            'label' => $this->label,
            'province_id' => $this->selectedProvince,
            'city_id' => $this->selectedCity,
            'full_address' => $this->fullAddress,
            'is_primary' => $this->setAsPrimary,
        ]);

        $this->dispatch('addressUpdated');

        $this->hasAddress = true;
        $this->resetInputs();
        $this->showModal = false;
    }

    public function resetInputs()
    {
        $this->recipientName = '';
        $this->phoneNumber = '';
        $this->label = '';
        $this->selectedProvince = null;
        $this->selectedCity = null;
        $this->fullAddress = '';
        $this->setAsPrimary = false;
    }

    public function addressUpdated()
    {
        $primaryAddress = $this->getPrimaryAddress();

        if ($primaryAddress) {
            $this->recipientName = $primaryAddress->recipient_name;
            $this->phoneNumber = $primaryAddress->phone_number;
            $this->label = $primaryAddress->label;
            $this->fullAddress = $primaryAddress->full_address;
            $this->selectedProvince = $primaryAddress->province_id;
            $this->selectedCity = $primaryAddress->city_id;
            $this->hasAddress = true;

            $province = Province::where('province_id', $primaryAddress->province_id)->first();
            $city = City::where('city_id', $primaryAddress->city_id)->first();

            $this->provinceName = $province ? $province->title : null;
            $this->cityName = $city ? $city->title : null;

            $this->couriers = $this->getCouriers();
        }
    }

    public function checkIfAddressExists()
    {
        return Address::where('user_id', Auth::user()->id)->exists();
    }

    public function render()
    {
        return view('livewire.backsite.card-purchase');
    }
}
