package project4;

public class Node
{
	private MazeCell data;
	private Node next;
	//for initializing the first node
	public Node(MazeCell mc)
	{
		this.data = mc;
		this.next = null;
	}
	
	public Node(MazeCell mc, Node nx)
	{
		this.data = mc;
		this.next = nx;
	}
	public MazeCell getData()
	{
		return this.data;
	}
	public Node getNext()
	{
		return this.next;
	}
	public void setNext(Node nx)
	{
		this.next = nx;
	}
}
