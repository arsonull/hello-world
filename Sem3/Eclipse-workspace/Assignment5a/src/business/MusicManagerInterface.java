package business;

import beans.Album;
import util.TracksNotFoundException;
import util.AlbumNotFoundException;

public interface MusicManagerInterface
{
	public Album addAlbum(Album album) throws TracksNotFoundException;
	public Album getAlbum(Album album) throws AlbumNotFoundException;
}