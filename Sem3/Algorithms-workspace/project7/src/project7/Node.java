package project7;

public class Node
{
	private String data;
	private Node next;
	
	public Node()
	{
		data = "";
		next = null;
	}
	public Node(String s)
	{
		data = s;
		next = null;
	}
	public Node (String s, Node n)
	{
		data = s;
		next = n;
	}
	
	public void setNext(Node n)
	{
		next = n;
	}
	public Node getNext()
	{
		return next;
	}
	public void setData(String s)
	{
		data = s;
	}
	public String getData()
	{
		return data;
	}
}
