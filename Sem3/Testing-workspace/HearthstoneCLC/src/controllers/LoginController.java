package controllers;

import javax.faces.bean.ManagedBean;
import javax.faces.bean.ViewScoped;
import javax.faces.context.FacesContext;
import javax.inject.Inject;
import javax.ws.rs.Path;

import beans.User;
import business.loginBusinessInterface;

@ManagedBean
@ViewScoped
public class LoginController {
	
	@Inject
	loginBusinessInterface service;
	
	public String onLogin(User user) {		
		
		System.out.println("Login Controller User: " + user.getUsername() + "Password: " + user.getPassword());
		
		User loginConformation = service.loginUser(user);		
		
		//if confirmation returns success then let user process to successful login page
		if(loginConformation.getUsername() != null && loginConformation.getPassword() != null) {			
			System.out.println("Returning to homepage with a user match");

			//Forward to test response view
			FacesContext.getCurrentInstance().getExternalContext().getSessionMap().put("user", loginConformation);
			//if username and password match parameters then log in otherwise take the customer to a loginFailed page
			return "homePage.xhtml";
		
		//if confirmation return false then take user to login failed page
		}else {
			System.out.println("Returning to login failed");

			FacesContext.getCurrentInstance().getExternalContext().getSessionMap().put("user", loginConformation);

			return "loginFail.xhtml";
		}

	}
		
	public String OnLogoff() {
		FacesContext.getCurrentInstance().getExternalContext().invalidateSession();
		return "loginForm.xhtml";
	}
	
	public loginBusinessInterface getService() {
		return service;
	}
	
	
}
