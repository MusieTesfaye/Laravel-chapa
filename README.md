# Laravel-chapa a laravel package to accept Payment with Chapa API.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/musie/laravel-chapa.svg?style=flat-square)](https://packagist.org/packages/musie/laravel-chapa)
[![Total Downloads](https://img.shields.io/packagist/dt/musie/laravel-chapa.svg?style=flat-square)](https://packagist.org/packages/musie/laravel-chapa)

A Laravel package to integrate the Chapa payment gateway easily into your Laravel applications. (It supports Laravel 11)

## Installation

You can install the package via composer:

1. **Require the package using Composer**:
    ```sh
    composer require musie/laravel-chapa
    ```

2. **Install the package**:
    ```sh
    php artisan chapa:install
    ```

3. **Add Environment Variables**:
    Add the following lines to your `.env` file:
    ```env
    CHAPA_SECRET_KEY=your-secret-key
    CHAPA_PUBLIC_KEY=your-public-key
    ```

## Usage

1. **Create a Payment Form**:
    Create a view file to include the payment form provided by the package. For example, create a new file named `payment.blade.php` in the `resources/views` directory and add the following content:
    ```html
    <form action="{{ route('chapa.payment') }}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="name" placeholder="Name" required>
        <input type="number" name="amount" placeholder="Amount" required>
        <button type="submit">Pay</button>
    </form>
    ```

2. **Add Routes**:
    Add routes in your `web.php` file to handle the payment and callback:
    ```php
    use Illuminate\Support\Facades\Route;
    use Musie\LaravelChapa\Controllers\ChapaController;

    Route::get('/', function () {
        return view('musie.form');
    });

    Route::post('chapa/payment', [ChapaController::class, 'initializePayment'])->name('chapa.payment');
    Route::get('chapa/callback', [ChapaController::class, 'handleCallback'])->name('chapa.callback');
    Route::get('chapa/verify/{tx_ref}', [ChapaController::class, 'verifyPayment'])->name('chapa.verify');
    ```

3. **Handle Callbacks**:
    Ensure you have a callback view to display the payment status. For example, you can use the provided `callback.blade.php` view:
    ```html
    @if($status == 'success')
        <p>Payment was successful!</p>
    @else
        <p>Payment failed. Please try again.</p>
    @endif
    ```

4. **Testing the Payment Integration**:
    - Run the webserver.
    - Fill out the form with the required details and submit it.
    - You should be redirected to the Chapa payment gateway.
    - After completing the payment, you should be redirected to the callback URL, where you can see the payment status.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
