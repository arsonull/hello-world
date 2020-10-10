package business;

import java.util.ArrayList;
import java.util.List;

import javax.ejb.Local;
import javax.ejb.LocalBean;
import javax.ejb.Stateless;
import javax.enterprise.inject.Alternative;

import beans.User;

/**
 * This is our EJB for users
 */
@Stateless
@Local(UserBusinessInterface.class)
@LocalBean
@Alternative
public class UserBusinessService implements UserBusinessInterface{

    /**
     * Default constructor. 
     */
	User user;
    public UserBusinessService() {
        // TODO Auto-generated constructor stub
    	user = new User();
    	
    }

	/**
     * @see OrdersBusinessInterface#test()
     */
    public void test() {
        // TODO Auto-generated method stub
    	System.out.println("Hello from the other side");
    }

    //the usual getters and setters
    public void setUsername(String name) {
		user.setUsername(name);
	}
    public void setPassword(String pword) {
		user.setPassword(pword);
	}
    
    public String getUsername() {
		return user.getUsername();
	}
    public String getPassword() {
		return user.getPassword();
	}

}
