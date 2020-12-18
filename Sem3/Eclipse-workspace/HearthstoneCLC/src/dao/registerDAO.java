package dao;

import java.sql.Connection;
import java.sql.SQLException;
import java.sql.Statement;

import javax.ejb.Local;
import javax.ejb.Stateless;
import javax.interceptor.Interceptors;

import beans.User;
import util.LoggingInterceptor;

@Interceptors(LoggingInterceptor.class) //allows for this class to be intercepted
@Stateless
@Local(RegisterDAOInterface.class)
public class RegisterDAO implements RegisterDAOInterface<User>{
	
	public boolean registerNewUser(User user, java.sql.Connection conn) {
		System.out.println("Entered registerNewUser() in registerDAO");

	    String sql = "INSERT INTO users(FIRSTNAME, LASTNAME, EMAIL, USERNAME, PASSWORD)VALUES('"+user.getFirstName()+"', '"+user.getLastName()+"', '"+user.getEmail()+"', '"+user.getUsername()+"', '"+user.getPassword()+"')"; 
    
	    try {
	    	//execute the SQL query	    	
	    	Statement stmt = conn.createStatement();
	    	int rs = stmt.executeUpdate(sql);
	    	if(rs == 1){		    	
		    	return true;
	    	}else {
	    		return false;
	    	}
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
	    //should not reach this
    	return false;
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

