package beans;

import java.util.ArrayList;
import java.util.List;
import javax.faces.bean.ManagedBean;
import javax.faces.bean.ViewScoped;
import javax.inject.Inject;

import business.PostBusinessInterface;

@ManagedBean
@ViewScoped
public class Posts 
{
	@Inject
	PostBusinessInterface service;
	

	List<Post> posts = new ArrayList<Post>();
	

	
	public Posts() 
	{
		
	}

	public List<Post> getPosts() 
	{
		return posts;
	}

	public void setPosts(List<Post> posts) 
	{
		this.posts = posts;
	}
	
	
}