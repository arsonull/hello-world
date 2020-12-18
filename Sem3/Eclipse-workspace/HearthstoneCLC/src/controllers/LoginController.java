package controllers;

import javax.faces.bean.ManagedBean;
import javax.faces.bean.ViewScoped;
import javax.faces.context.FacesContext;
import javax.inject.Inject;
import javax.interceptor.Interceptors;
import javax.ws.rs.Path;

import beans.User;
import beans.SampleCardInterface;
import business.SampleCardFactory;
import business.loginBusinessInterface;
import util.LoggingInterceptor;

@Interceptors(LoggingInterceptor.class) //allows for this class to be intercepted
@ManagedBean
@ViewScoped
public class LoginController {
	
	@Inject
	loginBusinessInterface service;
	
	public String onLogin(User user) {		
		
		System.out.println("Login Controller User: " + user.getUsername() + "Password: " + user.getPassword());
		
		User loginConformation = service.loginUser(user);		
		
		SampleCardFactory factory = new SampleCardFactory();
		
		SampleCardInterface leeroy = factory.getSampleCard("Leeroy");
		SampleCardInterface jaraxxus = factory.getSampleCard("Jaraxxus");
		SampleCardInterface tirion = factory.getSampleCard("Tirion");
		
		System.out.println("Here are some sample cards!");
		leeroy.printData();
		jaraxxus.printData();
		tirion.printData();
		
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
