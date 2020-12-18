package business;

import java.sql.DriverManager;
import java.sql.SQLException;

import javax.ejb.Local;
import javax.ejb.Stateless;
import javax.inject.Inject;
import javax.interceptor.Interceptors;

import dao.LoginDAOInterface;
import util.LoggingInterceptor;
import beans.User;

@Interceptors(LoggingInterceptor.class) //allows for this class to be intercepted
@Stateless
@Local(loginBusinessInterface.class)
public class LoginService implements loginBusinessInterface{
	
	@Inject
	LoginDAOInterface<User> service;

	public User loginUser(User user) {
		System.out.println("Entered loginUser() in loginService");
		java.sql.Connection conn = null;
	    String url = "jdbc:mysql://localhost:3306/HearthstoneAPI";
	    String username = "root";
	    String password = "root";
    
	    //try the connection
	    try {
	    	//Connect to database
	    	conn = DriverManager.getConnection(url, username, password);	    	
	    	//Make 2 users. One to call instance of loginDAO and return information back.     		    	
	    	User checkLogin = service.loginUser(user, conn);
	    	//2nd user would be a temp that will store whether the entered information matched any user in database
	    	User userLoggedIn = new User(null, null,null,null,null);
	    	
	    	//if results are found then return true
	    	if(checkLogin != null) { 	    		
	    	    String newUserUsername = checkLogin.getUsername();
	    	    String newUserPassword = checkLogin.getPassword();	
	    	    	    	    
	    	    userLoggedIn.setUsername(newUserUsername);
	    	    userLoggedIn.setPassword(newUserPassword);
		    }
	    	
	    	return userLoggedIn;
	    }catch(Exception e) {
	    		e.printStackTrace();
	    }finally {
	    	if(conn != null) {
	    		try {
	    			conn.close();
	    		}catch(SQLException e){
	    			e.printStackTrace();
	    		}
	    	}
	    }
	    //should not reach here
		return null;   	
	}

	
}
