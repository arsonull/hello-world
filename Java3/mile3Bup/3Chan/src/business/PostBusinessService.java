package business;

import java.util.ArrayList;
import java.util.List;

import javax.ejb.EJB;
import javax.ejb.Local;
import javax.ejb.Stateless;
import javax.enterprise.inject.Alternative;

import beans.Post;
//import beans.User;

import data.PostDataService;

/**
 * This is our EJB for users
 */
@Stateless
@Local(PostBusinessInterface.class)
@Alternative
public class PostBusinessService implements PostBusinessInterface{
	
	@EJB
	PostDataService service;
	
	List<Post> posts = new ArrayList<Post>();
    /**
     * Default constructor. 
     */
	public Post post;
	
    public PostBusinessService() {
        // TODO Auto-generated constructor stub
    	
    }

    //the usual getters and setters
    public void setUsername(String name) 
    {
		post.setUsername(name);
	}
    
    public void setTitle(String pword) 
    {
		post.setTitle(pword);
	}
    
    public void setContent(String c)
    {
    	post.setContent(c);
    }
    
    public String getUsername() 
    {
		return post.getUsername();
	}
    
    public String getTitle() 
    {
		return post.getTitle();
	}
    public String getContent()
    {
    	return post.getContent();
    }

	@Override
	public void test() {
		// TODO Auto-generated method stub
		
	}

	@Override
	public List<Post> getPosts() 
	{
    	return service.findAll();
	}

	@Override
	public void setPosts(List<Post> postss)
	{
		// TODO Auto-generated method stub
		this.posts = postss;
	}
	
	@Override
	public void newPost(Post post)
	{
		service.create(post);
	}
	
	@Override
	public void editPost(int id, String titl, String cont)
	{
		
	}
	
	
	public void deletePost(Post post) {
        PostDataService service = new PostDataService();
        service.delete(post);
    }

}