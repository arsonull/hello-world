package controllers;

import javax.faces.bean.ManagedBean;
import javax.faces.bean.ViewScoped;
import javax.faces.context.FacesContext;
import javax.inject.Inject;

import beans.Album;
import business.MusicManager;
import business.MusicManagerInterface;
import util.AlbumNotFoundException;
import util.TracksNotFoundException;

@ManagedBean
@ViewScoped
public class AlbumController
{
	@Inject
	MusicManagerInterface service;
	public String onSubmit(Album album)
	{
		try
		{
			album = service.addAlbum(album);
		}
		catch (TracksNotFoundException e)
		{
			System.out.println("===========> Album not found");
		}
		
		FacesContext.getCurrentInstance().getExternalContext().getRequestMap().put("album", album);
		return "AddAlbumResponse.xhtml";
	}
	
	public String findAlbum(Album album)
	{
		try
		{
			album = service.getAlbum(album);
		}
		catch (AlbumNotFoundException e)
		{
			System.out.println("===========> Album not found");
		}
		
		FacesContext.getCurrentInstance().getExternalContext().getRequestMap().put("album", album);
		return "AddAlbumResponse.xhtml";
	}
}
