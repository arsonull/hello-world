package controllers;

import javax.faces.bean.ManagedBean;
import javax.faces.bean.ViewScoped;
import javax.faces.context.FacesContext;
import javax.inject.Inject;

import beans.User;
import business.registerBusinessInterface;

@ManagedBean
@ViewScoped
public class RegisterController {
	
	@Inject 
	registerBusinessInterface service;
	
	public String onRegister(User user){						
		System.out.println("Register Controller User: " + user.getUsername() + " email: " + user.getEmail());

		//call instance of service and pass user into the registerUser method within the Register service
		boolean registerConfirmation = service.registerUser(user);
		//if it returns true then write basic info into text file and then take user to a register success page
		if(registerConfirmation == true) {
			System.out.println("Returning with register success");
			//Forward to test response view
			FacesContext.getCurrentInstance().getExternalContext().getSessionMap().put("user", user);

			return "registerSuccess.xhtml";	
		}else {
			System.out.println("Returning with register failure");
			//if confirmation returns as false then (just for now) take the user back to registerScreen
			return "registerFail.xhtml";
		}			
	}
	
	public registerBusinessInterface getService() {
		return service;
	}
	
	
}
