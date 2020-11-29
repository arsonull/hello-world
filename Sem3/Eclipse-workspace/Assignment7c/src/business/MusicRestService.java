package business;

import javax.enterprise.context.RequestScoped;
import javax.inject.Inject;
import javax.ws.rs.Consumes;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PathParam;
import javax.ws.rs.Produces;
import javax.ws.rs.core.MediaType;

import beans.Album;
import beans.ResponseDataModel;
import util.AlbumNotFoundException;

@RequestScoped
@Path("/music")
@Produces({"application/xml", "application/json" })
@Consumes({ "application/xml", "application/json" })
public class MusicRestService
{
	@Inject
	MusicManagerInterface service;
	//MusicManager service = new MusicManager();
	
	@GET
	@Path("/getalbumj/{title}/{artist}/{year}")
	@Produces(MediaType.APPLICATION_JSON)
	public ResponseDataModel getAlbumj(@PathParam("title") String title, 
			@PathParam("artist") String artist, @PathParam("year") int year)
	{
		ResponseDataModel response = getIt(title, artist, year);
		return response;
	}
	@GET
	@Path("/getalbumx/{title}/{artist}/{year}")
	@Produces(MediaType.APPLICATION_XML)
	public ResponseDataModel getAlbumx(@PathParam("title") String title, 
			@PathParam("artist") String artist, @PathParam("year") int year)
	{
		ResponseDataModel response = getIt(title, artist, year);
		return response;
	}
	
	private ResponseDataModel getIt(String title, String artist, int year)
	{
		Album album = new Album(title, artist, year);
		try
		{
			album = service.getAlbum(album);
			
			ResponseDataModel response = new ResponseDataModel(0, "", album);
			return response;
		}
		catch (AlbumNotFoundException e1)
		{
			ResponseDataModel response = new ResponseDataModel(-1, "Album Not Found", new Album());
			
			return response;
		}
		catch (Exception e2)
		{
			ResponseDataModel response = new ResponseDataModel(-2, "System Exception", new Album());
			
			return response;
		}
	}
}
