<style>

  .ajax_loading{
      width: 100vw;
      height: 100vh;
      z-index: 20;
  }

</style>
<div class="ajax_loading_container" style="display:none;">
  <div class="ajax_loading" style="display: flex;justify-content: center;align-items: center;background-color: rgba(255, 255, 255, 0.6);position: fixed;">
    <div class="row">
      <div class="col-md-12" >

        <img class="loading_img" src="{{asset('img/loader.gif')}}" alt="loading">

      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

  $( document ).ajaxStart(function() {
    $( ".ajax_loading_container" ).show();
  });

  $( document ).ajaxComplete(function() {
    $( ".ajax_loading_container" ).hide();
  });

</script>
