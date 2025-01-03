<div>
    <div class="input-group bootstrap-touchspin" style="width: 100px;"> <!-- Adjust width as needed -->
        <span class="input-group-btn input-group-prepend bootstrap-touchspin-injected">
            <button class="btn btn-primary bootstrap-touchspin-down" type="button"
                style="padding: 4px 8px; font-size: 12px;" wire:click="decrement">-</button>
        </span>
        <input type="text" class="text-center count touchspin form-control" style="font-size: 12px; height: 30px;"
            value="{{ $quantity }}" readonly>
        <span class="input-group-btn input-group-append bootstrap-touchspin-injected">
            <button class="btn btn-primary bootstrap-touchspin-up" type="button"
                style="padding: 4px 8px; font-size: 12px;" wire:click="increment">+</button>
        </span>
    </div>
</div>
