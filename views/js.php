<script>
jQuery( function( $ ) {
  $( '.js-open-api-explorer').on( 'click', function ( e ) {
    $('.js-api-url').val($(this).data('url'));
    $.ajax( {
        url: $(this).data('url'),
        success: function ( data ) {
            $('.js-api-result').html(JSON.stringify(data, null, 4));
        },
        cache: false
    });
  });
});
</script>