package dao;

import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

import javax.ejb.Local;
import javax.ejb.Stateless;
import javax.interceptor.Interceptors;

import beans.User;
import util.LoggingInterceptor;

@Interceptors(LoggingInterceptor.class) //allows for this class to be intercepted
@Stateless
@Local(LoginDAOInterface.class)
public class LoginDAO implements LoginDAOInterface<User>{
	
	public User loginUser(User user, java.sql.Connection conn) {
		System.out.println("Entered loginUser() in loginDAO");
	    
	    String userUsername = user.getUsername();
	    String userPassword = user.getPassword();
	    
	    String sql = "SELECT * FROM users WHERE USERNAME = '"+ userUsername+ "' AND PASSWORD = '"+ userPassword +"' LIMIT 1;";
	    //try the connection
	    try {
	    	//execute the SQL query	    	
	    	Statement stmt = conn.createStatement();
	    	ResultSet rs = stmt.executeQuery(sql);
	    	
	    	User userLoggedIn = new User(null, null,null,null,null);
	    	
	    	//if results are found then return true
	    	while(rs.next()) { 	    		
	    	    String newUserUsername = rs.getString("username");
	    	    String newUserPassword = rs.getString("password");	
	    	    	    	    
	    	    userLoggedIn.setUsername(newUserUsername);
	    	    userLoggedIn.setPassword(newUserPassword);
		    }
    	    rs.close();
	    	//return a user instance that contains the entered and matched login information
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

	@Override
	public boolean create(User user, Connection conn) {
		// TODO Auto-generated method stub
		return false;
	}

	@Override
	public boolean update(User user, Connection conn) {
		// TODO Auto-generated method stub
		return false;
	}

	@Override
	public boolean delete() {
		// TODO Auto-generated method stub
		return false;
	}

	
}
