@extends('layouts.default')

@section('title', 'Terms & Conditions')

@section('content')

    <main id="main">

        <!-- ======= Intro Single ======= -->
        <section class="intro-single">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="title-single-box">
                            <h1 class="title-single">Terms & Conditions</h1>
                            {{-- <span class="color-text-a">Grid Properties</span> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Intro Single-->

        <div class="container my-2">

            <section id="general-terms">
                <h2>1. General Terms</h2>
                <p>By placing an order with us, you are agreeing to the terms and conditions outlined here:</p>
                <ul>
                    <li>All prices are listed in Rupiah and are subject to change without prior notice.</li>
                    <li>You must be at least 18 years old to make a purchase or use our services.</li>
                </ul>
            </section>

            <section id="purchases-payments" class="mt-4">
                <h2>2. Purchases and Payments</h2>
                <ul>
                    <li>All purchases are subject to product availability. If an item is not in stock, we will notify you
                        promptly and provide alternatives where possible.</li>
                    <li>Payments must be made at the time of checkout using one of the accepted payment methods displayed on
                        our
                        website.</li>
                    <li>You agree to provide accurate billing and shipping information to avoid delays in order processing.
                    </li>
                </ul>
            </section>

            <section id="shipping-policy" class="mt-4">
                <h2>3. Shipping Policy</h2>
                <ul>
                    <li>Orders will be processed and shipped within 3 business days unless stated otherwise.</li>
                    <li>We are not responsible for delays caused by couriers, customs, or other unforeseen circumstances.
                    </li>
                    <li>Shipping fees, where applicable, are non-refundable.</li>
                </ul>
            </section>

            <section id="refund-policy" class="mt-4">
                <h2>4. Refund Policy</h2>
                <ul>
                    <li>Refunds are only available for eligible items returned within 3 days of purchase.</li>
                    <li>The item must be unused, in its original condition, and in the original packaging.</li>
                    <li>You must provide proof of purchase, such as a receipt or order confirmation.</li>
                    <li>Refunds will be processed within 3 business days after the item has been received and
                        inspected.
                    </li>
                </ul>
            </section>

            <section id="returns-exchanges" class="mt-4">
                <h2>5. Return and Exchange Policy</h2>
                <ul>
                    <li>Returns and exchanges must be initiated within 3 days of purchase.</li>
                    <li>Customers are responsible for the cost of return shipping unless the product is defective or
                        incorrect.
                    </li>
                    <li>If the item is deemed defective, a replacement will be provided at no additional cost.</li>
                </ul>
            </section>

            <section id="order-cancellations" class="mt-4">
                <h2>6. Order Cancellations</h2>
                <ul>
                    <li>Orders can only be canceled before they are processed for shipping.</li>
                    <li>A cancellation request must be sent via email to <a
                            href="mailto:admin@iesta.org">admin@iesta.org</a> with the order number as a
                        reference.
                    </li>
                </ul>
            </section>

            <section id="limitation-liability" class="mt-4">
                <h2>7. Limitation of Liability</h2>
                <ul>
                    <li>We are not liable for any damages, direct or indirect, resulting from the use of our website,
                        products,
                        or services.</li>
                    <li>In no event shall our liability exceed the total amount paid by you for the product or service in
                        question.</li>
                </ul>
            </section>

            <section id="dispute-resolution" class="mt-4">
                <h2>8. Dispute Resolution</h2>
                <ul>
                    <li>Any disputes arising from the use of our website or services will be governed by the laws of
                        Indonesia.</li>
                    <li>You agree to resolve disputes amicably before pursuing legal action.</li>
                </ul>
            </section>

            <section id="privacy-policy" class="mt-4">
                <h2>9. Privacy Policy</h2>
                <p>We respect your privacy and are committed to protecting your personal information. Please refer to our <a
                        href="/privacy-policy">Privacy Policy</a> for detailed information.</p>
            </section>

            <section id="amendments" class="mt-4">
                <h2>10. Amendments to Terms</h2>
                <ul>
                    <li>We reserve the right to amend these terms and conditions at any time. Changes will be effective
                        immediately upon posting.</li>
                    <li>Your continued use of our website constitutes your agreement to the updated terms.</li>
                </ul>
            </section>

            <section id="contact" class="mt-4">
                <h2>11. Contact Information</h2>
                <p>If you have any questions or concerns about these terms, please contact us:</p>
                <ul>
                    <li>Email: <a href="mailto:admin@iesta.org">admin@iesta.org</a></li>
                    <li>Phone: +6285394518769</li>
                </ul>
            </section>
        </div>
    </main>

@endsection
