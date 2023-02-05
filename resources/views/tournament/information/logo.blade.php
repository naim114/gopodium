<div class="text-center">
    <img id="previewLogo" class="img-thumbnail mt-3 mb-3" src="{{ asset(trans('app.logo')) }}" style="height: 200px">
    <button type="button" id="changeLogoButton" class="btn btn-secondary btn-block mt-3 w-100">
        <i class="fa fa-camera pr-2 pl-2"></i>
        Change Logo
    </button>

    <p id="guideMsgLogo" class="text-secondary hide">* Click on 'Update logo' to confirm logo change</p>

    <input type="file" id="fileInputLogo" name="logo" class="fileLogo hide" accept="image/*" required>
    <input type="text" class="form-control hide" disabled placeholder="Upload File" id="fileLogo">
    <button type="button" id="inputFileButtonLogo" class="browseLogo btn btn-secondary btn-block mt-3 w-100 hide">
        <i class="fa fa-upload pr-2 pl-2"></i>
        Upload Image
    </button>
    <button type="submit" class="btn btn-primary btn-block mt-3 mb-5 w-100">
        Update Logo
    </button>
</div>
