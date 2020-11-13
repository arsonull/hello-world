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
public class TrackFinder2 implements TrackFinderInterface
{
	HashMap<String, List<Track>> trackInfo;
	
	public TrackFinder2()
	{
		System.out.println("From trackfinder TWO");
		trackInfo = new HashMap<String, List<Track>>();
    	List<Track> tracks1 = new ArrayList<Track>();
    	tracks1.add(new Track("World so Cold", 1));
    	tracks1.add(new Track("House of the Rising Sun", 2));
    	tracks1.add(new Track("Jekyll and Hyde", 3));
    	
    	trackInfo.put("Five Finger Death Punch - Wrong Side of Heaven - 2012", tracks1);
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
