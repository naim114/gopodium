<div class="text-center">
    <form method="POST" enctype="multipart/form-data" action="{{ route('tournament.team.edit.logo') }}">
        @csrf
        <input name="id" type="text" value="{{ $team->id }}" hidden />
        <img id="preview" class="img-thumbnail" style="height: 150px; width: 150px"
            src="{{ asset($team->logo_path ?? 'assets/img/default-team.png') }}">

        <button type="button" id="changeLogoButton" class="btn btn-secondary btn-block mt-3 w-100">
            <i class="fa fa-camera pr-2 pl-2"></i>
            Change Logo
        </button>

        <p id="guideMsg" class="text-secondary hide">* Upload image and save changes to change tournament logo</p>

        <input type="file" id="fileInput" name="logo" class="file hide" accept="image/*" required>
        <input type="text" class="form-control hide" disabled placeholder="Upload File" id="file">
        <button type="button" id="inputFileButton" class="browse btn btn-secondary btn-block mt-3 w-100 hide">
            <i class="fa fa-upload pr-2 pl-2"></i>
            Upload Image
        </button>

        <button type="button" id="cancelChangeLogoButton" class="btn btn-outline-danger btn-block mt-3 w-100 hide">
            <i class="fa fa-times pr-2 pl-2"></i>
            Cancel Changes
        </button>

        <button type="submit" id="submitLogoButton" class="btn btn-primary btn-block mt-3 w-100 hide">
            <i class="fa fa-camera pr-2 pl-2"></i>
            Save Changes
        </button>
    </form>
</div>
