package util;

//This is unchecked, checked exception would extend Exception instead of RuntimeException
//Unchecked doesn't need to be caught, and won't notice during runtime. Checked needs to be
//caught and you will notice as it has the program has to do something with that exception
//Catch exceptions that can be fixed in code, otherwise don't catch. Such as fixing faulty code
//that should handle something, rather than a database exception. Can't fix database being down
// from in here.
public class TracksNotFoundException extends Exception
{
	private static final long serialVersionUID = 8749912411505566655L;
}