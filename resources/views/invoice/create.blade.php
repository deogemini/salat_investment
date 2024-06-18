@extends('layouts.dashboard')

@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title mb-0 text-center">Create Invoice </h4>
    </div>

    <div class="card-body">
        <div class="container mt-5">
            <form action="{{ route('invoices.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="customer_name">Customer Name</label>
                            <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="customer_phone">Customer Mobile Number</label>
                            <input type="number" class="form-control" id="customer_phone" name="customer_phone" required>
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="contact_person">Contact Person</label>
                            <input type="text" class="form-control" id="contact_person" name="contact_person" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="customer_tinnumber">Customer Tin Number</label>
                            <input type="number" class="form-control" id="customer_tinnumber" name="customer_tinnumber" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="customer_address">Customer Address</label>
                            <input type="text" class="form-control" id="customer_address" name="customer_address" required>
                        </div>
                    </div>
                </div>
                <div id="items"></div>

                <div class="form-group col-md-6">
                    <label for="total_amount">Total Amount</label>
                    <input type="text" class="form-control" id="total_amount" name="total_amount" readonly>
                </div>

                <button type="button" class="btn btn-secondary" onclick="addItem()">Add Item</button>
                <button type="submit" class="btn btn-primary">Create Invoice</button>
            </form>
        </div>
        @endsection

        <script>
            let itemIndex = 0;

            function addItem() {
                const itemDiv = document.createElement('div');
                itemDiv.classList.add('item');
                itemDiv.innerHTML = `
                    <div class="form-group col-md-6">
                        <label for="description_${itemIndex}">Item Description</label>
                        <input type="text" class="form-control" id="description_${itemIndex}" name="items[${itemIndex}][description]" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="quantity_${itemIndex}">Quantity</label>
                            <input type="number" class="form-control" id="quantity_${itemIndex}" name="items[${itemIndex}][quantity]" required oninput="calculateTotal()">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="price_${itemIndex}">Price</label>
                            <input type="number" step="0.01" class="form-control" id="price_${itemIndex}" name="items[${itemIndex}][price]" required oninput="calculateTotal()">
                        </div>
                    </div>
                `;
                document.getElementById('items').appendChild(itemDiv);
                itemIndex++;
            }

            function calculateTotal() {
                let total = 0;
                for (let i = 0; i < itemIndex; i++) {
                    const quantity = document.querySelector(`#quantity_${i}`).value;
                    const price = document.querySelector(`#price_${i}`).value;
                    if (quantity && price) {
                        total += (parseFloat(quantity) * parseFloat(price));
                    }
                }
                document.getElementById('total_amount').value = total.toFixed(2);
            }
        </script>

