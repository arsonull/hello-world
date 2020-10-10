package controllers;

import beans.User;

import java.io.Serializable;

import javax.faces.bean.ManagedBean;
import javax.faces.bean.ManagedProperty;
import javax.faces.bean.RequestScoped;
import javax.faces.bean.ViewScoped;
import javax.faces.context.FacesContext;

@ManagedBean(name="navigationController")
@RequestScoped

public class NavigationController implements Serializable {
	//this is for navigation between pages. It's not very robust or complicated yet, but I hope to grow this. -Aiden
	//this managed property will read value from request parameter pageId
	   @ManagedProperty(value = "#{param.pageId}")
	   private String pageId;

	   //condional navigation based on pageId
	   //if pageId is 1 show page1.xhtml,
	   //if pageId is 2 show page2.xhtml
	   //else show home.xhtml
	   
	   public String showPage() {
	      if(pageId == null) {
	         return "home";
	      }
	      
	      if(pageId.equals("1")) {
	         return "Login";
	      }else if(pageId.equals("2")) {
	         return "Register";
	      }else {
	         return "index";
	      }
	   }
}
