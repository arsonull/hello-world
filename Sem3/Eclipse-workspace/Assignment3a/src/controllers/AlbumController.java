package controllers;

import javax.faces.bean.ManagedBean;
import javax.faces.bean.ViewScoped;
import javax.faces.context.FacesContext;
import beans.Album;
import business.MusicManager;
import util.TracksNotFoundException;

@ManagedBean
@ViewScoped
public class AlbumController
{
	public String onSubmit(Album album)
	{
		System.out.println("in controller with " + album.getArtist());
		MusicManager mgr = new MusicManager();
		System.out.println("mgr made");
		try
		{
			System.out.println("try");
			album = mgr.addAlbum(album);
		}
		catch (TracksNotFoundException e)
		{
			System.out.println("===========> Album not found");
		}
		
		FacesContext.getCurrentInstance().getExternalContext().getRequestMap().put("album", album);
		System.out.println("returning...");
		return "AddAlbumResponse.xhtml";
	}
}
