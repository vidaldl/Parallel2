<script src="{{ asset('js/vendor/jquery/jquery.min.js') }}"></script>
<form method="POST" id="post" action="{{route('password.request')}}">
  @csrf

</form>
<script>
$(function(){
  $('#post').submit();
});
</script>
