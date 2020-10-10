package beans;

import java.util.HashSet;

import javax.faces.bean.ManagedBean;
import javax.faces.bean.ViewScoped;
import javax.validation.constraints.NotNull;
import javax.validation.constraints.Size;

@ManagedBean
@ViewScoped
public class Post
{
	int ID = 0;
	@NotNull(message = "Titles are important, please don't leave this blank and make it less than 15 characters.")
	@Size(min=1,max=15)
    String title = "";
	@NotNull(message = "Don't have an empty body of content for your post, you'll be boring! Maximum size is 300 characters")
	@Size(min=1,max=300)
    String content = "";
    String username ="";
    int uid = 0;
    public Post() 
    {
        title = "Temp";
        content = "Temp";
        username = "temp";
        uid = 1;
    }
    
    public Post(String t, String c, int u) 
    {
        title = t;
        content = c;
        username = "uid found";
        uid = u;
    }
    
    public Post(String t, String c)
    {
    	title = t;
    	content = c;
    	uid = 1;
    }
    
    public void setID(HashSet id) {
        this.ID = (int    )id.toArray()[0];
    }

	public String getUsername()
	{
		return username;
	}
	
	public String getContent()
	{
		return content;
	}
	
	public String getTitle()
	{
		return title;
	}
	
	public int getUID()
	{
		return uid;
	}
	
	public int getID()
	{
		return ID;
	}
	
	public void setContent(String c)
	{
		this.content = c;
	}
	
	public void setTitle(String t)
	{
		this.title = t;
	}
	
	public void setUsername(String n)
	{
		this.username = n;
	}

    

}