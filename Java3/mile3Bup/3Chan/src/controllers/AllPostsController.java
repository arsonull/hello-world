package controllers;

import java.util.Map;

import javax.faces.bean.ManagedBean;
import javax.faces.bean.ViewScoped;
import javax.faces.context.FacesContext;
import javax.inject.Inject;

import beans.Post;
import business.PostBusinessInterface;
import business.PostBusinessService;


@ManagedBean
@ViewScoped
public class AllPostsController {
    
    @Inject 
    PostBusinessInterface service;
    
    
    public String onSubmit(Post post) {
        
        service.test();
        FacesContext.getCurrentInstance().getExternalContext().getRequestMap().put("post", post);
        return "ViewAllPosts.xhtml";        
    }
    
    public PostBusinessInterface getService()
    {
        return service;
    }
    public String deletePost(Post post) {
        
        System.out.println(post.getID());
        PostBusinessService business = new PostBusinessService();
        business.deletePost(post);
        return "ViewAllPosts.xhtml";
    }
}