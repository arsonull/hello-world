package dao;

import beans.User;

public interface LoginDAOInterface<User> {
	
	public User loginUser(User user,  java.sql.Connection conn);	
	public boolean create(User user,  java.sql.Connection conn);
	public boolean update(User user,  java.sql.Connection conn);
	public boolean delete();

}
