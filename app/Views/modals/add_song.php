<!-- Modal for adding a song -->
<div class="modal" id="addSongModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add a Song</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <!-- Add song form -->
        <form action="/musicplayer/add-song" method="post" enctype="multipart/form-data">
          <!-- Song title -->
          <div class="mb-3">
            <label for="songTitle" class="form-label">Song Title</label>
            <input type="text" class="form-control" id="songTitle" name="songTitle" required>
          </div>
          <!-- Song file input -->
          <div class="mb-3">
            <label for="songFile" class="form-label">Select a Song File</label>
            <input type="file" class="form-control" id="songFile" name="songFile" accept=".mp3" required>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
        </form>
        <!-- End of add song form -->

      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal for adding a song -->