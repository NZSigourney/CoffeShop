<form action="{{ route('vnpay.payment', Auth::user()->id) }}" method="POST">
    @csrf
    <button type="submit" class="btn" style="margin-left: 150px; margin-bottom: 10px;" name="redirect" value="VNPAY">Thanh toán VNPAY</button>
</form>