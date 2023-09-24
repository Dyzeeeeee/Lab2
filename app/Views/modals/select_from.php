<!-- Modal for creating or selecting a playlist -->
<div class="modal" id="addToPlaylistModal">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <h4 class="modal-title">Select Playlist</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <form action="/musicplayer/add-to-playlist" method="post">
               <!-- Hidden input for music ID -->
               <input type="hidden" id="musicID" name="musicID" value="">
               <select name="playlistName" class="form-control">
                  <?php foreach ($playlists as $playlist) : ?>
                  <option value="<?= $playlist['pl_id'] ?>"><?= $playlist['pl_name'] ?></option>
                  <?php endforeach; ?>
               </select>
               <br>
               <button type="submit" class="btn btn-primary">Add</button>
            </form>
         </div>

         <!-- Modal footer -->
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<!-- Modal for creating or selecting a playlist -->
