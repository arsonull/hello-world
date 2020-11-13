package business;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

import javax.ejb.Local;
import javax.ejb.LocalBean;
import javax.ejb.Stateless;
import javax.enterprise.inject.Alternative;

import beans.Album;
import beans.Track;

@Stateless
@Local(TrackFinderInterface.class)
@LocalBean
@Alternative //This allows swapping implementations of the trackfinder interface
public class TrackFinder1 implements TrackFinderInterface
{
	HashMap<String, List<Track>> trackInfo;
	
	public TrackFinder1()
	{
		System.out.println("From trackfinder ONE");
		trackInfo = new HashMap<String, List<Track>>();
    	List<Track> tracks1 = new ArrayList<Track>();
    	tracks1.add(new Track("Taxman", 1));
    	tracks1.add(new Track("Eleanor Rigby", 2));
    	tracks1.add(new Track("Yellow Submarine", 3));
    	
    	trackInfo.put("The Beatles - Revolver - 1966", tracks1);
	}

	@Override
	public List<Track> getTracks(Album album)
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
