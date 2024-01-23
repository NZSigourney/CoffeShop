<form action="{{ route('vnpay.payment', Auth::user()->id) }}" method="POST">
    @csrf
    <button type="submit" class="btn" name="redirect" value="VNPAY">Thanh toán VNPAY</button>
</form>