package controllers;

//import javax.faces.bean.ManagedBean;
import javax.faces.view.ViewScoped;

import java.io.Serializable;

import javax.faces.context.FacesContext;
import javax.inject.Inject;
import javax.inject.Named;
import javax.interceptor.Interceptors;

import beans.Album;
import business.MusicManagerInterface;
import util.LoggingInterceptor;
import util.TracksNotFoundException;

//@ManagedBean
@Interceptors(LoggingInterceptor.class)
@Named
@ViewScoped
public class AlbumController implements Serializable
{
	private static final long serialVersionUID = 1L;
	@Inject
	MusicManagerInterface mgr;
	public String onSubmit(Album album)
	{
		//MusicManager mgr = new MusicManager();
		try
		{
			album = mgr.addAlbum(album);
		}
		catch (TracksNotFoundException e)
		{
			System.out.println("===========> Album not found");
		}
		
		FacesContext.getCurrentInstance().getExternalContext().getRequestMap().put("album", album);
		return "AddAlbumResponse.xhtml";
	}
}
