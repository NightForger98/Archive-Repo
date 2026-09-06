package LinkListDouble;

public class DepthFirstSearch {
private boolean[] marked;
private int [] edgeTo;
private int s;
public DepthFirstSearch(Graph G, int s) {
	this.s = s;
	edgeTo = new int[G.V()];
	marked = new boolean[G.V()];
	dfs(G,s);	
}
private void dfs(Graph G, int v ) {
	marked[v]= true;
	for(int w : G.adj(v)) {
		if(!marked[w]) {
			edgeTo[w] = v;
			dfs(G,w);
		}
	
}

}
public boolean hasPathTo(int V) {return marked[V];}
public Iterable <Integer> pathTo(int v ){
	if(!hasPathTo(v)) return null;
	
}
}