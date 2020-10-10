package controllers;

import beans.Post;
import beans.Posts;
import beans.User;
import business.PostBusinessService;

import java.util.List;

import javax.faces.bean.ManagedBean;
import javax.faces.bean.ViewScoped;
import javax.faces.context.FacesContext;

@ManagedBean
@ViewScoped
public class FormController {
	//User user;
	
	public String onSubmit() {
		//Forward to Test Response View along with the User Managed Bean
		PostBusinessService service = new PostBusinessService();
		List<Post> posts = service.getPosts();
		
		FacesContext.getCurrentInstance().getExternalContext().getRequestMap().put("Posts", posts);
		return "ViewPosts.xhtml";
	}
	
}
