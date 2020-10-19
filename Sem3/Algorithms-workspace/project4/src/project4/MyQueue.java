package project4;


public class MyQueue
{
	Node head = null;
	Node tail = null;
	int size = 0;
	
	//For instantiating a stack with the first node
	public MyQueue(MazeCell n)
	{
		Node no = new Node(n);
		head = no;
		tail = no;
		tail.setPrev(head);
		size = 1;
	}
	
	public void push(MazeCell n)
	{
		Node no = new Node(n, head);
		head.setPrev(no);
		head = no;
		if (tail == null)
		{
			tail = no;
			tail.setPrev(no);
		}
		size++;
	}
	public void pop()
	{
		tail = tail.getPrev();
		size--;
	}
	public MazeCell front()
	{
		return tail.getData();
	}
	public int size()
	{
		return size;
	}
	public boolean empty()
	{
		if(size == 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}