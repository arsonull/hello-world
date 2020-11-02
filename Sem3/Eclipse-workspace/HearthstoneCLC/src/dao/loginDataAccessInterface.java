package dao;

import beans.User;

public interface loginDataAccessInterface<User> {
	
	public User loginUser(User user,  java.sql.Connection conn);	
	public boolean create(User user,  java.sql.Connection conn);
	public boolean update(User user,  java.sql.Connection conn);
	public boolean delete();

}
