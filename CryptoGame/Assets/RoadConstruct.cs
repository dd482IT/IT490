using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class RoadConstruct : MonoBehaviour
{
    //Spawn Values
    public int CreditSpawnRate = 3;
    public int TallBlockSpawnRate = 3;

    //Object Calls

    public Transform roadObj;
    private Vector3 nextRoad;

    public Transform roadBlockObj;
    private Vector3 nextRoadBlock;

    public Transform tallRoadBlockObj;
    private Vector3 nextTallRoadBlock;

    public Transform creditObj;
    private Vector3 nextCredit;

    private int randX;


    void Start()
    {
        nextRoad.z = 24;
        StartCoroutine(spawnTile());
    }

    void Update()
    {

    }

    IEnumerator spawnTile()
    {
        //Road Tile Spawner
        yield return new WaitForSeconds(1);
        Instantiate(roadObj, nextRoad, roadObj.rotation, transform);
        nextRoad.z += 3;

        //Credit and Road BLOCK spawner

        if (Random.Range(0, CreditSpawnRate) == 1)
        {
            randX = Random.Range(-1, 2);
            nextCredit = nextRoad;
            nextCredit.y = .5f;
            nextCredit.x = randX;
            Instantiate(creditObj, nextCredit, creditObj.rotation, transform);
        }
        else
        {
            if (Random.Range(0, TallBlockSpawnRate) == 1)
            {
                randX = Random.Range(-2, 1);
                nextTallRoadBlock = nextRoad;
                nextTallRoadBlock.y = .1f;
                nextTallRoadBlock.x = randX;
                Instantiate(tallRoadBlockObj, nextTallRoadBlock, tallRoadBlockObj.rotation, transform);
            }
            else
            {
                randX = Random.Range(-2, 1);
                nextRoadBlock = nextRoad;
                nextRoadBlock.y = .1f;
                nextRoadBlock.x = randX;
                Instantiate(roadBlockObj, nextRoadBlock, roadBlockObj.rotation, transform);

                if (Random.Range(0, 2) == 1)
                {
                    randX = Random.Range(-2, 1);
                    nextRoadBlock = nextRoad;
                    nextRoadBlock.y = .1f;
                    nextRoadBlock.z += 1.5f;
                    nextRoadBlock.x = randX;
                    Instantiate(roadBlockObj, nextRoadBlock, roadBlockObj.rotation, transform);
                }
            }
        }

        StartCoroutine(spawnTile());
    }
}