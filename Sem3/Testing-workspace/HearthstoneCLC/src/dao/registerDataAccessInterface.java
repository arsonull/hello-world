package dao;

public interface registerDataAccessInterface<User> {

	public boolean registerNewUser(User user, java.sql.Connection conn);
	
	public boolean create(User user,  java.sql.Connection conn);
	public boolean update(User user,  java.sql.Connection conn);
	public boolean delete();
	
}
