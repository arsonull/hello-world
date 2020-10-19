package project4;

public class Node
{
	private MazeCell data;
	private Node next;
	private Node prev;
	//for initializing the first node
	public Node(MazeCell mc)
	{
		this.data = mc;
		this.next = null;
		this.prev = null;
	}
	
	public Node(MazeCell mc, Node nx)
	{
		this.data = mc;
		this.next = nx;
		this.prev = null;
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
	public void setPrev(Node pv)
	{
		this.prev = pv;
	}
	public Node getPrev()
	{
		return this.prev;
	}
}
