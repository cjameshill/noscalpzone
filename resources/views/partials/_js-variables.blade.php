<script>
    window.NoScalpZone = <?php echo json_encode([
        'csrfToken' => csrf_token(),
        'stripeKey' => env('STRIPE_KEY'),
        'angoliaKey' => env('ANGOLIA_KEY'),
        'user' => auth()->user(),
        'page' => $page,
        'notificationDelay' => 4000
    ]); ?>

</script>