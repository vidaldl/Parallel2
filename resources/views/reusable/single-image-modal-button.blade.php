<div class="form-group">
  <label for="image" class="col-form-label">Imagen</label><br>
  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalImage">Principal &nbsp;&nbsp;<i class="fas fa-image"></i></a>
</div>
<!--modal image-->
<div class="modal fade" id="modalImage" tabindex="-1" role="dialog" aria-labelledby="modalBack" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#4066D4;">
      <button style="color:white;" type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>
      <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
              <label for="logo" class="col-form-label">Imagen</label>
              <form id="image" method="POST" class="image dropzone" action="{{ route($ruta) }}" enctype="multipart/form-data">
                @csrf
              </form>
              @error('image')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
            </div>
            <div class="col-md-8">
              @if(isset($shop_items))
              <img style="width:100%;" src="{{'/storage/' . $image}}" class="logoThumb img-fluid img-thumbnail rounded">
              @endif
              <div class="editador d-none" style="width:450px; height: 600px; background-color: #000;">
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer ">
        <button class="buttonConfirm btn btn-primary d-none">Confirmar</button>
      </div>
    </div>
  </div>
</div>
<!-- End modal image -->
<script src="{{asset('lib/dropzone/dropzone.js')}}"></script>
<script src="{{asset('lib/cropper/cropper.js')}}"></script>
<script type="text/javascript">
Dropzone.options.image = {
  paramName: "image",

   transformFile: function(file, done) {
      var myDropZone = this;
      var editor = $('.editador');
      var logoThumb = $('.logoThumb');
      $(logoThumb).addClass('d-none');
      $(editor).removeClass('d-none');
      $(editor).addClass('d-block');
      // Create confirm button at the top left of the viewport
      var buttonConfirm = $('.buttonConfirm');
      $(buttonConfirm).removeClass('d-none');
      $(buttonConfirm).addClass('d-block');
      $(buttonConfirm).click(function() {
        // Get the canvas with image data from Cropper.js
         var canvas = cropper.getCroppedCanvas({
           width: 300,
           height: 600
         });
         // Turn the canvas into a Blob (file object without a name)
         canvas.toBlob(function(blob) {
           // Create a new Dropzone file thumbnail
            myDropZone.createThumbnail(
              blob,
              myDropZone.options.thumbnailWidth,
              myDropZone.options.thumbnailHeight,
              myDropZone.options.thumbnailMethod,
              false,
              function(dataURL) {

                // Update the Dropzone file thumbnail
                myDropZone.emit('thumbnail', file, dataURL);
                // Return the file to Dropzone
                done(blob);
            });
         });
        // Remove the editor from the view
        $(buttonConfirm).removeClass('d-block');
        $(buttonConfirm).addClass('d-none');


      });

      // Create an image node for Cropper.js
     var image = new Image();
     image.src = URL.createObjectURL(file);
     // editor.appendChild(image);
     $(image).appendTo(editor)
     // Create Cropper.js
     var cropper = new Cropper(image, { aspectRatio: 1/2 });
 },
 init: function () {

    this.on("complete", function (file) {
      setTimeout(
        function()
        {
          location.reload();
        }, 1500);
    });
  }
};
</script>
