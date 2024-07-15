<form action="{{ route('chapa.payment') }}" method="POST">
    @csrf
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="name" placeholder="Name" required>
    <input type="number" name="amount" placeholder="Amount" required>
    <button type="submit">Pay</button>
</form>
