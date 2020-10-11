package business;

import beans.Album;
import beans.Track;
import util.TracksNotFoundException;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

import javax.ejb.Local;
import javax.ejb.LocalBean;
import javax.ejb.Stateless;

/**
 * Session Bean implementation class MusicManager
 */
@Stateless
@Local(MusicManagerInterface.class)
@LocalBean
public class MusicManager implements MusicManagerInterface
{
	HashMap<String, List<Track>> trackInfo;
	
    /**
     * Default constructor. 
     */
    public MusicManager()
    {
    	trackInfo = new HashMap<String, List<Track>>();
    	List<Track> tracks1 = new ArrayList<Track>();
    	tracks1.add(new Track("Taxman", 1));
    	tracks1.add(new Track("Eleanor Rigby", 2));
    	
    	trackInfo.put("The Beatles - Revolver - 1966", tracks1);
    }

	/**
	 * example of Facade design pattern
     * 1. Looks up the albums' tracks
     * 2. Validates the Tracks are valid
     * 3. Persists the Album in the Database (next week)
     */
    public Album addAlbum(Album album)
    {
    	// Step 1
        album.setTracks(getTracks(album));
        //Step 2
        if(album.getNumberTracks() == 0)
        {
        	throw new TracksNotFoundException();
        }
        //Step 3 to do
        
        //return
        return album;
    }
    
    private List<Track> getTracks(Album album)
    {
    	String key = album.getArtist() + " - " + album.getTitle() + " - " + album.getYear();
    	if (trackInfo.containsKey(key))
    	{
    		return trackInfo.get(key);
    	}
    	else
    	{
    		return new ArrayList<Track>();
    	}
    }

}