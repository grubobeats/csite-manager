<div class="alert alert-info alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <i class="fa fa-info-circle"></i>  <strong>Like Construction Manager?</strong> <a href="#" class="alert-link">Donate developers</a> for new features!

    <form action="{{ route('post.checkout') }}" method="POST">
      {{ csrf_field() }}
      <script
        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
        data-key="pk_test_jnQoANlW94gaHnZ8LXl7V6AH"
        data-amount="5000"
        data-label="Donate developers"
        data-name="Construction Manager"
        data-description="Donating developers"
        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
        data-locale="auto">
      </script>
    </form>
</div>
