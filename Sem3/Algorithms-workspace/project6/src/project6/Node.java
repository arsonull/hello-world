package project6;

public class Node
{
	String data;
	Node left;
	Node right;
	
	public Node()
	{
		data = "";
		left = null;
		right = null;
	}
	public Node(String s)
	{
		data = s;
		left = null;
		right = null;
	}
	
	public void addLeft(Node n)
	{
		left = n;
	}
	public Node getLeft()
	{
		return left;
	}
	
	public void addRight(Node n)
	{
		right = n;
	}
	public Node getRight()
	{
		return right;
	}
	public String getData()
	{
		return data;
	}
	public void setData(String s)
	{
		data = s;
	}
	public boolean hasLeft()
	{
		if (left != null) return true;
		else return false;
	}
	public boolean hasRight()
	{
		if (right != null) return true;
		else return false;
	}
}
