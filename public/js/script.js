$(document).ready(function () {
  // Get references to the button and modal
  const modal = $("#myModal");
  const modalData = $("#modalData");
  const musicID = $("#musicID");
  // Function to open the modal with the specified data
  function openModalWithData(dataId) {
    // Set the data inside the modal content
    modalData.text("Data ID: " + dataId);
    musicID.val(dataId);
    // Display the modal
    modal.css("display", "block");
  }

  // Add click event listeners to all open modal buttons

  // When the user clicks the close button or outside the modal, close it
  modal.click(function (event) {
    if (event.target === modal[0] || $(event.target).hasClass("close")) {
      modal.css("display", "none");
    }
  });
});

const audio = document.getElementById("audio");
const playlist = document.getElementById("playlist");
const playlistItems = playlist.querySelectorAll("li");

let currentTrack = 0;

function playTrack(trackIndex) {
  if (trackIndex >= 0 && trackIndex < playlistItems.length) {
    const track = playlistItems[trackIndex];
    const trackSrc = track.getAttribute("data-src");
    audio.src = trackSrc;
    audio.play();
    currentTrack = trackIndex;
  }
}

function nextTrack() {
  currentTrack = (currentTrack + 1) % playlistItems.length;
  playTrack(currentTrack);
}

function previousTrack() {
  currentTrack =
    (currentTrack - 1 + playlistItems.length) % playlistItems.length;
  playTrack(currentTrack);
}

playlistItems.forEach((item, index) => {
  item.addEventListener("click", () => {
    playTrack(index);
  });
});

audio.addEventListener("ended", () => {
  nextTrack();
});

playTrack(currentTrack);





  function deletePlaylist(playlistId) {
    if (confirm('Are you sure you want to delete this playlist?')) {
      $.ajax({
        url: '/music/delete-playlist/' + playlistId, // Update the URL as needed
        type: 'DELETE',
        success: function (response) {
          // Reload the page or update the playlist modal as needed
          // For example, you can reload the page with: window.location.reload();
        },
        error: function (error) {
          alert('Failed to delete the playlist.');
        }
      });
    }
  }

