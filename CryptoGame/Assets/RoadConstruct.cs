using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class RoadConstruct : MonoBehaviour
{
    //Game Values
    public int difficulty = 1;


    //Object Calls

    public Transform roadTile;
    private Vector3 nextRoadTile;

    public Transform roadBlockShort;
    public Transform roadBlockTall;

    private Vector3 nextRoadBlock;

   

    public Transform credit;
    private Vector3 nextCredit;
    private float timeToLive;


    void Start()
    {
        nextRoadTile.z = 21;
        nextRoadBlock.z = 20;
        nextCredit.z = 21.5f;


        StartCoroutine(spawnTile());
    }

    void Update()
    {

    }



    IEnumerator spawnTile()
    {
        yield return new WaitForSeconds(.5f);
        switch (difficulty)
        {
            case 0:
                // EASY MODE
                spawnRoad();
                spawnBlock(5);
                spawnCredit(3);
                timeToLive = 3f;
                break;

            case 1:
                // NORMAL MODE
                spawnRoad();
                spawnRoad();
                spawnBlock(3);
                spawnCredit(5);
                timeToLive = 3f;
                break;

            case 2:
                // HARD MODE
                spawnRoad();
                spawnRoad();
                spawnRoad();
                spawnBlock(2);
                spawnCredit(5);
                timeToLive = 2f;
                break;
        }
        StartCoroutine(spawnTile());
    }






    // SPAWNING FUNCTIONS 
    void spawnRoad()
    {
        Destroy(Instantiate(roadTile, nextRoadTile, roadTile.rotation, transform).gameObject, timeToLive);
        nextRoadTile.z += 3;

    }

    void spawnBlock(int tallSpawnRate)
    {
        if (Random.Range(1, tallSpawnRate) == 1)
        {
            nextRoadBlock.x = Random.Range(-1, 2);
            nextRoadBlock.z += 3;
            nextRoadBlock.y = .1f;

            Destroy(Instantiate(roadBlockTall, nextRoadBlock, roadBlockTall.rotation, transform).gameObject, timeToLive);


        }
        else
        {
            nextRoadBlock.x = Random.Range(-1, 2);
            nextRoadBlock.z += 3;
            nextRoadBlock.y = .1f;
            Destroy(Instantiate(roadBlockShort, nextRoadBlock, roadBlockShort.rotation, transform).gameObject, timeToLive);
        }
    }


    void spawnCredit(int creditSpawnRate)
    {
        if (Random.Range(1, creditSpawnRate) == 1)
        {
            nextCredit = nextRoadBlock;
            nextCredit.x = Random.Range(-1, 2);
            nextCredit.z += 1.5f;
            nextCredit.y = .5f;


            Destroy(Instantiate(credit, nextCredit, credit.rotation,transform).gameObject, timeToLive);

        }
    }
}