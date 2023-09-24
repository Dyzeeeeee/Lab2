<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/musicplayer', 'MusicController::MusicPlayer');
$routes->post('/musicplayer/create-playlist', 'MusicController::create_playlist');
$routes->post('/musicplayer/add-song', 'MusicController::add_song');
$routes->post('/musicplayer/delete-song/(:num)', 'MusicController::deleteSong/$1');
$routes->post('/musicplayer/add-to-playlist', 'MusicController::addToPlaylist');
$routes->post('/musicplayer/delete-playlist/(:num)', 'MusicController::deletePlaylist/$1');
$routes->get('/musicplayer/search', 'MusicController::search');
$routes->get('musicplayer/playlist/(:segment)', 'MusicController::playlist/$1');
// $routes->get('musicplayer/playlist/(:segment)', 'MusicController::playlist/$1');





