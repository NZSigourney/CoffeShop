<form action="{{ route('vnpay.payment', Auth::user()->id) }}" method="POST">
    @csrf
    <div class="button-container">
        <button type="submit" class="btn" name="redirect" value="VNPAY">Thanh toán VNPAY</button>
    </div>
</form>