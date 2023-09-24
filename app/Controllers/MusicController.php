<?php

namespace App\Controllers;

use App\Controllers\BaseController;



class MusicController extends BaseController
{
    private $musicModel;
    private $playlistModel;
    private $playmusicModel;

    public function __construct()
    {
        $this->musicModel = new \App\Models\MusicModel();
        $this->playlistModel = new \App\Models\PlaylistModel();
        $this->playmusicModel = new \App\Models\PlayMusicModel();
    }
    public function MusicPlayer()
    {


        // Fetch songs from the database using your musicModel
        $data = [
            'songs' => $this->musicModel->findAll(),
            'playlists' => $this->playlistModel->findAll(),
        ];
        // Pass the $songs variable to the view
        return view('index', $data);
    }




    // Controller method to handle file upload
    public function add_song()
    {
        $songTitle = $this->request->getPost('songTitle');
        $songFile = $this->request->getFile('songFile');

        // Generate a unique filename for the uploaded song
        $newName = $songTitle . '.mp3';

        // Move the uploaded song to the public/music_list folder
        $songFile->move(ROOTPATH . 'public/music_list', $newName);

        // Insert a record into the tbl_music table
        // $musicModel = new MusicModel();
        $data = [
            'ms_name' => $songTitle,
            'ms_path' => 'music_list/' . $newName,
        ];


        $this->musicModel->insert($data);

        return redirect()->to('/musicplayer');
    }


    public function create_playlist_modal()
    {
        $data = [
            'songs' => $this->musicModel->findAll(),
        ];
        return view('modals/create_playlist_modal', $data); // Pass the $data array to the modal view
    }

    public function create_playlist()
    {

        // Get the playlist name from the form
        $playlistName = $this->request->getPost('playlistName');

        // Create a new playlist record in the tbl_playlist table

        $data = [
            'pl_name' => $playlistName,
        ];

        $playlistId = $this->playlistModel->insert($data);

        // Get the selected songs from the form
        $selectedSongs = $this->request->getPost('selectedSongs');

        if (is_array($selectedSongs)) {
            // Loop through the selected songs and update the tbl_playmusic table
            foreach ($selectedSongs as $songId) {
                $playMusicData = [
                    'id_ms' => $songId,
                    'id_pl' => $playlistId,
                ];
                $this->playmusicModel->insert($playMusicData);
            }
        }

        return redirect()->to('/musicplayer');
    }

    public function deleteSong($songId)
    {
        // Load your MusicModel here
        // $musicModel = new MusicModel();

        // Check if the song exists
        $song = $this->musicModel->find($songId);

        // Delete the song from the database
        $this->musicModel->delete($songId);

        // Redirect back to the main page with a success message
        return redirect()->to('/musicplayer');
    }
    public function addToPlaylist()
    {
        $musicID = $this->request->getPost('musicID');
        $playlistId = $this->request->getPost('playlistName');

        // Check if the playlist exists (optional, you can add this check if needed)
        $playlist = $this->playlistModel->find($playlistId);

        if ($playlist) {
            // Insert a record into the tbl_playmusic table
            $data = [
                'id_ms' => $musicID,  // Song ID
                'id_pl' => $playlistId, // Playlist ID
            ];

            $this->playmusicModel->insert($data);

            return redirect()->to('/musicplayer');
        } else {
            // Handle the case where the playlist doesn't exist
            return redirect()->to('/musicplayer')->with('error', 'Playlist not found.');
        }
    }

    public function deletePlaylist($playlistId)
    {
        // Load your PlaylistModel (adjust the namespace if needed)
        // $playlistModel = new \App\Models\PlaylistModel();

        // Check if the playlist with $playlistId exists
        $playlist = $this->playlistModel->find($playlistId);

        if ($playlist) {
            // Delete the playlist by its ID
            $this->playlistModel->delete($playlistId);

            // Optionally, you can also delete associated records in tbl_playmusic if needed
            // $this->playmusicModel->where('id_pl', $playlistId)->delete();

            // Return a success message or status
            return redirect()->to('/musicplayer');
        }
    }

    public function search()
    {
        // Get the search query from the URL
        $searchQuery = $this->request->getGet('search');

        // Load the MusicModel (adjust the namespace if needed)
        // $musicModel = new \App\Models\MusicModel();

        // Perform the search using the MusicModel's searchSongs method
        $songs = $this->musicModel->searchSongs($searchQuery);

        // Pass the search results to your view
        $data = [
            'songs' => $songs,
            'playlists' => $this->playlistModel->findAll(), // Assuming you need playlists as well
        ];

        // Load your view with the search results
        return view('index', $data);
    }

    // MusicController.php

    public function playlist($playlistName)
    {
        // Load your MusicModel, PlaylistModel, and PlayMusicModel as needed


        // Get the playlist ID by its name
        $playlist = $this->playlistModel->where('pl_name', $playlistName)->first();

        if ($playlist) {
            // Query the database to fetch songs associated with the playlist
            $songsInPlaylist = $this->playmusicModel
                ->select('tbl_music.*')
                ->join('tbl_music', 'tbl_playmusic.id_ms = tbl_music.ms_id')
                ->where('tbl_playmusic.id_pl', $playlist['pl_id'])
                ->get()
                ->getResultArray();

            // Pass the songs and playlist name to the view
            $data = [
                'playlists' => $this->playlistModel->findAll(),
                'songs' => $songsInPlaylist,
                'playlistName' => $playlistName,
            ];

            return view('playlist_view', $data);
        } else {
            // Handle the case where the playlist doesn't exist
            return redirect()->to('/musicplayer')->with('error', 'Playlist not found.');
        }
    }
}
